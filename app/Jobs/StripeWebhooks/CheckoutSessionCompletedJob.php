<?php

namespace App\Jobs\StripeWebhooks;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Models\WebhookCall;
use Illuminate\Support\Facades\Log;
use App\Models\Compound;

class CheckoutSessionCompletedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var \Spatie\WebhookClient\Models\WebhookCall */
    public $webhookCall;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //anything to do here
        $SessionData = $this->webhookCall->payload['data']['object'];
        // Log::debug('Stripe SessionData ID : ' . $SessionData['id']);
        // Log::debug('Keydata : ' . $SessionData['metadata']['data_key']);

        // Make it simple je. Once dah completed, terus labelkan compound tu as paid
        // X perlu buat asing, buat dlm ni terus je. Sbb nk ajar Syahmi bnde basic je pn.
        // But still, it's no a good practice laa.
        $compound_id = intval($SessionData['metadata']['data_key']);
        $compound = Compound::find($compound_id);
        $compound->payment_status = true;
        $compound->save();

    }
}
