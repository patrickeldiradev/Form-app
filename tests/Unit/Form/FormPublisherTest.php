<?php

namespace Tests\Unit\Form;

use App\Modules\Form\FormFactory;
use App\Modules\Form\Models\Form;
use App\Modules\Form\Models\FormStorage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Redis;
use Tests\TestCase;

class FormPublisherTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var FormFactory
     */
    protected FormFactory $factory;

    /**
     * @var Form
     */
    protected Form $form;

    /**
     * @var FormStorage
     */
    protected FormStorage $formStorage;

    public function setUp(): void
    {
        parent::setUp();

        $this->factory = new FormFactory();

        // seed the database
        $this->artisan('db:seed');

        $this->factory->createFormSaver()
            ->storeForm($this->getData()['checklist']);

        $this->form = Form::where('uuid', '86d25d21-539a-4472-ac74-823c85eea236')->first();

        $this->formStorage = FormStorage::where('key', $this->form->uuid)->first();
    }

    /**
     * Test form storage and cache.
     *
     * @return void
     */
    public function test_form_storage_and_cache()
    {
        $this->factory->createFormPublisher()->publish($this->form);

        $cachedData = Redis::get($this->form->uuid);

        $this->assertDatabaseHas('form_storage', [
            'key' => $this->form->uuid,
        ]);

        $this->assertEquals(json_decode($cachedData, true), json_decode($this->formStorage->data, true));
    }

    /**
     * @return array[]
     */
    protected function getData(): array
    {
        return [
            "checklist" => [
                "checklist_title" => "Test task form",
                "checklist_description" => "A form example for the test task",
                "form" => [
                    "uuid" => "86d25d21-539a-4472-ac74-823c85eea236",
                    "type" => "form",
                    "items" => [
                        [
                            "title" => "Page 1",
                            "uuid" => "2dd886b4-581f-43bb-addc-e79bd66ce382",
                            "type" => "page",
                            "items" => [
                                [
                                    "uuid" => "d4f0a2f5-9ff3-40fc-97e0-14d22e52d3c6",
                                    "title" => "question 1",
                                    "image_id" => null,
                                    "type" => "question",
                                    "response_type" => "list",
                                    "required" => false,
                                    "params" => [
                                        "response_set" => "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d",
                                        "multiple_selection" => false
                                    ],
                                    "check_conditions_for" => [
                                    ],
                                    "categories" => [
                                    ],
                                    "negative" => false,
                                    "notes_allowed" => true,
                                    "photos_allowed" => true,
                                    "issues_allowed" => true,
                                    "responded" => false,
                                    "answer" => "hello world"
                                ],
                                [
                                    "title" => "section 1",
                                    "uuid" => "b10081c9-c953-4001-9914-e0557e193f29",
                                    "type" => "section",
                                    "repeat" => false,
                                    "weight" => 1,
                                    "required" => false,
                                    "items" => [
                                        [
                                            "uuid" => "4a9b3c49-7678-4743-94f3-2d246f59361e",
                                            "title" => "question 2",
                                            "image_id" => null,
                                            "type" => "question",
                                            "response_type" => "list",
                                            "required" => false,
                                            "params" => [
                                                "response_set" => "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d",
                                                "multiple_selection" => false
                                            ],
                                            "check_conditions_for" => [
                                            ],
                                            "categories" => [
                                            ],
                                            "negative" => false,
                                            "notes_allowed" => true,
                                            "photos_allowed" => true,
                                            "issues_allowed" => true,
                                            "responded" => false,
                                            "answer" => "hello ertre"
                                        ],
                                        [
                                            "uuid" => "00331d70-b55a-49ed-b033-bb969c1ab79c",
                                            "title" => "question 3",
                                            "image_id" => null,
                                            "type" => "question",
                                            "response_type" => "list",
                                            "required" => false,
                                            "params" => [
                                                "response_set" => "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d",
                                                "multiple_selection" => false
                                            ],
                                            "check_conditions_for" => [
                                            ],
                                            "categories" => [
                                            ],
                                            "negative" => false,
                                            "notes_allowed" => true,
                                            "photos_allowed" => true,
                                            "issues_allowed" => true,
                                            "responded" => false,
                                            "answer" => "hello worddddfdld"
                                        ],
                                        [
                                            "title" => "section 2",
                                            "uuid" => "9a228880-5c0a-43b0-bdcd-57e748b197e0",
                                            "type" => "section",
                                            "repeat" => false,
                                            "weight" => 1,
                                            "required" => false,
                                            "items" => [
                                                [
                                                    "uuid" => "edc5f3e2-d039-47d7-97c7-0b13d92e6926",
                                                    "title" => "question 4",
                                                    "image_id" => null,
                                                    "type" => "question",
                                                    "response_type" => "list",
                                                    "required" => false,
                                                    "params" => [
                                                        "response_set" => "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d",
                                                        "multiple_selection" => false
                                                    ],
                                                    "check_conditions_for" => [
                                                    ],
                                                    "categories" => [
                                                    ],
                                                    "negative" => false,
                                                    "notes_allowed" => true,
                                                    "photos_allowed" => true,
                                                    "issues_allowed" => true,
                                                    "responded" => false,
                                                    "answer" => "sdfdsfds world"
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                [
                                    "uuid" => "9d7f581f-1942-404e-b77e-e9f147d96ff7",
                                    "title" => "question 5",
                                    "image_id" => null,
                                    "type" => "question",
                                    "response_type" => "list",
                                    "required" => false,
                                    "params" => [
                                        "response_set" => "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d",
                                        "multiple_selection" => false
                                    ],
                                    "check_conditions_for" => [
                                    ],
                                    "categories" => [
                                    ],
                                    "negative" => false,
                                    "notes_allowed" => true,
                                    "photos_allowed" => true,
                                    "issues_allowed" => true,
                                    "responded" => false,
                                    "answer" => "fdf worldfffd"
                                ],
                                [
                                    "title" => "section 3",
                                    "uuid" => "b4695ada-6e05-4425-a361-1133796c165e",
                                    "type" => "section",
                                    "repeat" => false,
                                    "weight" => 1,
                                    "required" => false,
                                    "items" => [
                                        [
                                            "uuid" => "19b7e5de-8eda-44ba-a75c-5eadedf9921b",
                                            "title" => "question 6",
                                            "image_id" => null,
                                            "type" => "question",
                                            "response_type" => "list",
                                            "required" => false,
                                            "params" => [
                                                "response_set" => "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d",
                                                "multiple_selection" => false
                                            ],
                                            "check_conditions_for" => [
                                            ],
                                            "categories" => [
                                            ],
                                            "negative" => false,
                                            "notes_allowed" => true,
                                            "photos_allowed" => true,
                                            "issues_allowed" => true,
                                            "responded" => false,
                                            "answer" => "heldddlo wodfdfdfdrld"
                                        ]
                                    ]
                                ]
                            ],
                            "params" => [
                                "collapsed" => false
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
