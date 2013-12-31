<?php

namespace Tests\Unit\Form;

use App\Modules\Form\FormFactory;
use App\Modules\Form\Models\FormItem;
use App\Modules\Form\Models\Question;
use App\Modules\Form\Models\Section;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FormSaverTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var FormFactory
     */
    protected FormFactory $factory;

    public function setUp(): void
    {
        parent::setUp();

        $this->factory = new FormFactory();

        // seed the database
        $this->artisan('db:seed');
    }

    /**
     * Test store form.
     *
     * @return void
     */
    public function test_store_form()
    {
        $this->factory->createFormSaver()
            ->storeForm($this->getData()['checklist']);

        $this->assertDatabaseHas('forms', [
            'id' => 1,
            'uuid' => '86d25d21-539a-4472-ac74-823c85eea236',
            'checklist_title' => 'Test task form',
            'checklist_description' => 'A form example for the test task',
            'type' => 'form',
        ]);

        $this->assertDatabaseCount('forms', 1);
        $this->assertDatabaseCount('form_storage', 1);
    }

    /**
     * Test store form item.
     *
     * @return void
     */
    public function test_store_form_item()
    {
        $this->factory->createFormSaver()
            ->storeForm($this->getData()['checklist']);

        $savedData = FormItem::get(['id', 'uuid', 'form_id', 'parent_uuid', 'item_id', 'item_type', 'title'])->toArray();

        $expectedData = [
            [
                'id' => 1,
                'uuid' => '2dd886b4-581f-43bb-addc-e79bd66ce382',
                'form_id' => 1,
                'parent_uuid' => null,
                'item_id' => 1,
                'item_type' => 'App\Modules\Form\Models\Page',
                'title' => 'Page 1',
            ],
            [
                'id' => 2,
                'uuid' => 'd4f0a2f5-9ff3-40fc-97e0-14d22e52d3c6',
                'form_id' => 1,
                'parent_uuid' => '2dd886b4-581f-43bb-addc-e79bd66ce382',
                'item_id' => 1,
                'item_type' => 'App\Modules\Form\Models\Question',
                'title' => 'question 1',
            ],
            [
                'id' => 3,
                'uuid' => 'b10081c9-c953-4001-9914-e0557e193f29',
                'form_id' => 1,
                'parent_uuid' => '2dd886b4-581f-43bb-addc-e79bd66ce382',
                'item_id' => 1,
                'item_type' => 'App\Modules\Form\Models\Section',
                'title' => 'section 1',
            ],
            [
                'id' => 4,
                'uuid' => '4a9b3c49-7678-4743-94f3-2d246f59361e',
                'form_id' => 1,
                'parent_uuid' => 'b10081c9-c953-4001-9914-e0557e193f29',
                'item_id' => 2,
                'item_type' => 'App\Modules\Form\Models\Question',
                'title' => 'question 2',
            ],
            [
                'id' => 5,
                'uuid' => '00331d70-b55a-49ed-b033-bb969c1ab79c',
                'form_id' => 1,
                'parent_uuid' => 'b10081c9-c953-4001-9914-e0557e193f29',
                'item_id' => 3,
                'item_type' => 'App\Modules\Form\Models\Question',
                'title' => 'question 3',
            ],
            [
                'id' => 6,
                'uuid' => '9a228880-5c0a-43b0-bdcd-57e748b197e0',
                'form_id' => 1,
                'parent_uuid' => 'b10081c9-c953-4001-9914-e0557e193f29',
                'item_id' => 2,
                'item_type' => 'App\Modules\Form\Models\Section',
                'title' => 'section 2',
            ],
            [
                'id' => 7,
                'uuid' => 'edc5f3e2-d039-47d7-97c7-0b13d92e6926',
                'form_id' => 1,
                'parent_uuid' => '9a228880-5c0a-43b0-bdcd-57e748b197e0',
                'item_id' => 4,
                'item_type' => 'App\Modules\Form\Models\Question',
                'title' => 'question 4',
            ],
            [
                'id' => 8,
                'uuid' => '9d7f581f-1942-404e-b77e-e9f147d96ff7',
                'form_id' => 1,
                'parent_uuid' => '2dd886b4-581f-43bb-addc-e79bd66ce382',
                'item_id' => 5,
                'item_type' => 'App\Modules\Form\Models\Question',
                'title' => 'question 5',
          ],
             [
                 'id' => 9,
                'uuid' => 'b4695ada-6e05-4425-a361-1133796c165e',
                'form_id' => 1,
                'parent_uuid' => '2dd886b4-581f-43bb-addc-e79bd66ce382',
                'item_id' => 3,
                'item_type' => 'App\Modules\Form\Models\Section',
                'title' => 'section 3',
              ],
             [
                 'id' => 10,
                'uuid' => '19b7e5de-8eda-44ba-a75c-5eadedf9921b',
                'form_id' => 1,
                'parent_uuid' => 'b4695ada-6e05-4425-a361-1133796c165e',
                'item_id' => 6,
                'item_type' => 'App\Modules\Form\Models\Question',
                'title' => 'question 6',
              ]
        ];

        $this->assertEquals($savedData, $expectedData);
        $this->assertDatabaseCount('form_items', 10);
    }

    /**
     * Test store form item page.
     *
     * @return void
     */
    public function test_store_form_item_page()
    {
        $this->factory->createFormSaver()
            ->storeForm($this->getData()['checklist']);

        $this->assertDatabaseHas('pages', [
            "id" => 1,
            "uuid" => "2dd886b4-581f-43bb-addc-e79bd66ce382",
            "params->collapsed" => false,
        ]);

        $this->assertDatabaseCount('pages', 1);
    }

    /**
     * Test store form item questions.
     *
     * @return void
     */
    public function test_store_form_item_questions()
    {
        $this->factory->createFormSaver()
            ->storeForm($this->getData()['checklist']);

        $savedData = Question::get([
            'id',
            'uuid',
            'image_id',
            'required',
            'response_type',
            'check_conditions_for',
            'categories',
            'negative',
            'notes_allowed',
            'photos_allowed',
            'issues_allowed',
            'responded',
            'params',
        ])->toArray();

        $expectedData = [
            [
                'id' => 1,
                'uuid' => 'd4f0a2f5-9ff3-40fc-97e0-14d22e52d3c6',
                'image_id' => null,
                'required' => 0,
                'response_type' => 'list',
                'check_conditions_for' => '[]',
                'categories' => '[]',
                'negative' => 0,
                'notes_allowed' => 1,
                'photos_allowed' => 1,
                'issues_allowed' => 1,
                'responded' => 0,
                'params' => '{"response_set": "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d", "multiple_selection": false}',
            ],
            [
                'id' => 2,
                'uuid' => '4a9b3c49-7678-4743-94f3-2d246f59361e',
                'image_id' => null,
                'required' => 0,
                'response_type' => 'list',
                'check_conditions_for' => '[]',
                'categories' => '[]',
                'negative' => 0,
                'notes_allowed' => 1,
                'photos_allowed' => 1,
                'issues_allowed' => 1,
                'responded' => 0,
                'params' => '{"response_set": "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d", "multiple_selection": false}',
            ],
            [
                'id' => 3,
                'uuid' => '00331d70-b55a-49ed-b033-bb969c1ab79c',
                'image_id' => null,
                'required' => 0,
                'response_type' => 'list',
                'check_conditions_for' => '[]',
                'categories' => '[]',
                'negative' => 0,
                'notes_allowed' => 1,
                'photos_allowed' => 1,
                'issues_allowed' => 1,
                'responded' => 0,
                'params' => '{"response_set": "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d", "multiple_selection": false}',
            ],
            [
                'id' => 4,
                'uuid' => 'edc5f3e2-d039-47d7-97c7-0b13d92e6926',
                'image_id' => null,
                'required' => 0,
                'response_type' => 'list',
                'check_conditions_for' => '[]',
                'categories' => '[]',
                'negative' => 0,
                'notes_allowed' => 1,
                'photos_allowed' => 1,
                'issues_allowed' => 1,
                'responded' => 0,
                'params' => '{"response_set": "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d", "multiple_selection": false}',
            ],
            [
                'id' => 5,
                'uuid' => '9d7f581f-1942-404e-b77e-e9f147d96ff7',
                'image_id' => null,
                'required' => 0,
                'response_type' => 'list',
                'check_conditions_for' => '[]',
                'categories' => '[]',
                'negative' => 0,
                'notes_allowed' => 1,
                'photos_allowed' => 1,
                'issues_allowed' => 1,
                'responded' => 0,
                'params' => '{"response_set": "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d", "multiple_selection": false}',
            ],
            [
                'id' => 6,
                'uuid' => '19b7e5de-8eda-44ba-a75c-5eadedf9921b',
                'image_id' => null,
                'required' => 0,
                'response_type' => 'list',
                'check_conditions_for' => '[]',
                'categories' => '[]',
                'negative' => 0,
                'notes_allowed' => 1,
                'photos_allowed' => 1,
                'issues_allowed' => 1,
                'responded' => 0,
                'params' => '{"response_set": "1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d", "multiple_selection": false}',
            ],
        ];

        $this->assertEquals($savedData, $expectedData);
        $this->assertDatabaseCount('questions', 6);
    }

    /**
     * Test store form item sections.
     *
     * @return void
     */
    public function test_store_form_item_sections()
    {
        $this->factory->createFormSaver()
            ->storeForm($this->getData()['checklist']);

        $savedData = Section::get([
            'id',
            'uuid',
            'repeat',
            'weight',
            'required',
        ])->toArray();

        $expectedData = [
            [
                'id' => 1,
                'uuid' => 'b10081c9-c953-4001-9914-e0557e193f29',
                'repeat' => 0,
                'weight' => 1,
                'required' => 0,
            ],
            [
                'id' => 2,
                'uuid' => '9a228880-5c0a-43b0-bdcd-57e748b197e0',
                'repeat' => 0,
                'weight' => 1,
                'required' => 0,
            ],
            [
                'id' => 3,
                'uuid' => 'b4695ada-6e05-4425-a361-1133796c165e',
                "repeat" => 0,
                "weight" => 1,
                "required" => 0,
            ],
        ];

        $this->assertEquals($savedData, $expectedData);
        $this->assertDatabaseCount('sections', 3);
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
