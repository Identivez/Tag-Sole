<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $orderDetails = $this->order->orderDetails()->with('product')->get();

        $mailMessage = (new MailMessage)
            ->subject('Confirmación de Pedido #' . $this->order->OrderId)
            ->greeting('¡Gracias por tu compra!')
            ->line('Hemos recibido tu pedido y lo estamos procesando.')
            ->line('Detalles del pedido:')
            ->line('Número de pedido: #' . $this->order->OrderId)
            ->line('Fecha: ' . $this->order->OrderDate->format('d/m/Y H:i'))
            ->line('Total: $' . number_format($this->order->TotalAmount, 2));

        // Agregar los productos
        $mailMessage->line('Productos:');
        foreach ($orderDetails as $detail) {
            $mailMessage->line($detail->product->Name . ' x ' . $detail->Quantity . ' - $' . number_format($detail->UnitPrice * $detail->Quantity, 2));
        }

        $mailMessage->action('Ver mi pedido', route('orders.confirmation', $this->order->OrderId))
            ->line('¡Gracias por comprar con nosotros!');

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->OrderId,
            'total' => $this->order->TotalAmount,
        ];
    }
}
