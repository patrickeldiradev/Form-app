<?php

namespace App\Modules\Form\Service;

use App\Modules\Form\Models\Form;
use App\Modules\Form\Models\FormStorage;
use Illuminate\Support\Facades\Redis;

class FormPublisher
{
    /**
     * @param \App\Modules\Form\Models\Form $form
     * @return void
     */
    public function publish(Form $form): void
    {
        $form = $form->load(['items.itemDetails', 'items.items']);
        $denormalizedFormData = $this->denormalizeForm($form);
        $publishedForm = $this->storeDenormalizedForm($form, $denormalizedFormData);
        $this->syncDataInStorage($publishedForm);
    }

    /**
     * @param $form
     * @return string
     */
    protected function denormalizeForm($form): string
    {
        return $form->toJson();
    }

    /**
     * @param $form
     * @param $denormalizedFormData
     * @return \App\Modules\Form\Models\FormStorage
     */
    protected function storeDenormalizedForm($form, $denormalizedFormData): FormStorage
    {
        return FormStorage::updateOrCreate(
            ['key' => $form->uuid],
            [
                'form_id' => $form->id,
                'data' => $denormalizedFormData,
            ],
        );
    }

    /**
     * @param $publishedForm
     * @return void
     */
    protected function syncDataInStorage($publishedForm): void
    {
        Redis::set($publishedForm->key, $publishedForm->data);
    }
}
