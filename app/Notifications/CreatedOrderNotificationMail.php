<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatedOrderNotificationMail extends Notification
{
    use Queueable;
    private $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('shoplaptoptm@gmail.com', 'Shop Laptop TM')
            ->subject('Thông báo đặt đơn hàng thành công')
            ->greeting('Xin chào ' . $this->order->customer_name)
            ->line('Bạn vừa đặt thành công đơn hàng có mã số ' . $this->order->id)
            ->line('Người nhận hàng: ' . $this->order->customer_name)
            ->line('Số điện thoại: ' . $this->order->phone_number)
            ->line('Địa chỉ: ' . $this->order->address . ', ' . $this->order->city . ', ' . $this->order->country)
            ->line('Hình thức thanh toán: ' . $this->order->payment_method)
            ->line('Tổng tiền: ' . number_format($this->order->total_price) . ' VNĐ');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
