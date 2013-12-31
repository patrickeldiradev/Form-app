<?php

namespace Tests\Unit\Form;

use App\Modules\Form\FormFactory;
use App\Modules\Shared\DTO\FormTransfer;
use App\Modules\Shared\DTO\PageTransfer;
use App\Modules\Shared\DTO\QuestionTransfer;
use App\Modules\Shared\DTO\SectionTransfer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class JsonParserTest extends TestCase
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
     * Test parse form data.
     *
     * @return void
     */
    public function test_parse_form_data()
    {
        $parsedData = $this->factory->createJsonParserService()->parse($this->getData()['checklist']);

        $this->assertEquals($parsedData, $this->getExpectedParsedData());
    }

    /**
     * @return array
     */
    protected function getExpectedParsedData(): array
    {
        $data['form'] = new FormTransfer();
        $data['form']->setUuid('86d25d21-539a-4472-ac74-823c85eea236');
        $data['form']->setType('form');
        $data['form']->setChecklistTitle('Test task form');
        $data['form']->setChecklistDescription('A form example for the test task');

        $items[0] = new PageTransfer();
        $items[0]->setParentUuid(null);
        $items[0]->setType('page');
        $items[0]->setTitle('Page 1');
        $items[0]->setUuid('2dd886b4-581f-43bb-addc-e79bd66ce382');
        $items[0]->setParams(['collapsed' => false]);

        $items[1] = new QuestionTransfer();
        $items[1]->setParentUuid('2dd886b4-581f-43bb-addc-e79bd66ce382');
        $items[1]->setType('question');
        $items[1]->setTitle('question 1');
        $items[1]->setUuid('d4f0a2f5-9ff3-40fc-97e0-14d22e52d3c6');
        $items[1]->setImageId(null);
        $items[1]->setResponseType('list');
        $items[1]->setRequired(false);
        $items[1]->setParams([
            'response_set' => '1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d',
            'multiple_selection' => false,
        ]);
        $items[1]->setCheckConditionsFor([]);
        $items[1]->setCategories([]);
        $items[1]->setNegative(false);
        $items[1]->setNotesAllowed(true);
        $items[1]->setPhotosAllowed(true);
        $items[1]->setIssuesAllowed(true);
        $items[1]->setResponded(false);
        $items[1]->setAnswer('hello world');

        $items[2] = new SectionTransfer();
        $items[2]->setParentUuid('2dd886b4-581f-43bb-addc-e79bd66ce382');
        $items[2]->setType('section');
        $items[2]->setTitle('section 1');
        $items[2]->setUuid('b10081c9-c953-4001-9914-e0557e193f29');
        $items[2]->setRepeat(false);
        $items[2]->setWeight(1);
        $items[2]->setRequired(false);


        $items[3] = new QuestionTransfer();
        $items[3]->setParentUuid('b10081c9-c953-4001-9914-e0557e193f29');
        $items[3]->setType('question');
        $items[3]->setTitle('question 2');
        $items[3]->setUuid('4a9b3c49-7678-4743-94f3-2d246f59361e');
        $items[3]->setImageId(null);
        $items[3]->setResponseType('list');
        $items[3]->setRequired(false);
        $items[3]->setParams([
            'response_set' => '1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d',
            'multiple_selection' => false,
        ]);
        $items[3]->setCheckConditionsFor([]);
        $items[3]->setCategories([]);
        $items[3]->setNegative(false);
        $items[3]->setNotesAllowed(true);
        $items[3]->setPhotosAllowed(true);
        $items[3]->setIssuesAllowed(true);
        $items[3]->setResponded(false);
        $items[3]->setAnswer('hello ertre');


        $items[4] = new QuestionTransfer();
        $items[4]->setParentUuid('b10081c9-c953-4001-9914-e0557e193f29');
        $items[4]->setType('question');
        $items[4]->setTitle('question 3');
        $items[4]->setUuid('00331d70-b55a-49ed-b033-bb969c1ab79c');
        $items[4]->setImageId(null);
        $items[4]->setResponseType('list');
        $items[4]->setRequired(false);
        $items[4]->setParams([
            'response_set' => '1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d',
            'multiple_selection' => false,
        ]);
        $items[4]->setCheckConditionsFor([]);
        $items[4]->setCategories([]);
        $items[4]->setNegative(false);
        $items[4]->setNotesAllowed(true);
        $items[4]->setPhotosAllowed(true);
        $items[4]->setIssuesAllowed(true);
        $items[4]->setResponded(false);
        $items[4]->setAnswer('hello worddddfdld');

        $items[5] = new SectionTransfer();
        $items[5]->setParentUuid('b10081c9-c953-4001-9914-e0557e193f29');
        $items[5]->setType('section');
        $items[5]->setTitle('section 2');
        $items[5]->setUuid('9a228880-5c0a-43b0-bdcd-57e748b197e0');
        $items[5]->setRepeat(false);
        $items[5]->setWeight(1);
        $items[5]->setRequired(false);

        $items[6] = new QuestionTransfer();
        $items[6]->setParentUuid('9a228880-5c0a-43b0-bdcd-57e748b197e0');
        $items[6]->setType('question');
        $items[6]->setTitle('question 4');
        $items[6]->setUuid('edc5f3e2-d039-47d7-97c7-0b13d92e6926');
        $items[6]->setImageId(null);
        $items[6]->setResponseType('list');
        $items[6]->setRequired(false);
        $items[6]->setParams([
            'response_set' => '1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d',
            'multiple_selection' => false,
        ]);
        $items[6]->setCheckConditionsFor([]);
        $items[6]->setCategories([]);
        $items[6]->setNegative(false);
        $items[6]->setNotesAllowed(true);
        $items[6]->setPhotosAllowed(true);
        $items[6]->setIssuesAllowed(true);
        $items[6]->setResponded(false);
        $items[6]->setAnswer('sdfdsfds world');

        $items[7] = new QuestionTransfer();
        $items[7]->setParentUuid('2dd886b4-581f-43bb-addc-e79bd66ce382');
        $items[7]->setType('question');
        $items[7]->setTitle('question 5');
        $items[7]->setUuid('9d7f581f-1942-404e-b77e-e9f147d96ff7');
        $items[7]->setImageId(null);
        $items[7]->setResponseType('list');
        $items[7]->setRequired(false);
        $items[7]->setParams([
            'response_set' => '1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d',
            'multiple_selection' => false,
        ]);
        $items[7]->setCheckConditionsFor([]);
        $items[7]->setCategories([]);
        $items[7]->setNegative(false);
        $items[7]->setNotesAllowed(true);
        $items[7]->setPhotosAllowed(true);
        $items[7]->setIssuesAllowed(true);
        $items[7]->setResponded(false);
        $items[7]->setAnswer('fdf worldfffd');

        $items[8] = new SectionTransfer();
        $items[8]->setParentUuid('2dd886b4-581f-43bb-addc-e79bd66ce382');
        $items[8]->setType('section');
        $items[8]->setTitle('section 3');
        $items[8]->setUuid('b4695ada-6e05-4425-a361-1133796c165e');
        $items[8]->setRepeat(false);
        $items[8]->setWeight(1);
        $items[8]->setRequired(false);

        $items[9] = new QuestionTransfer();
        $items[9]->setParentUuid('b4695ada-6e05-4425-a361-1133796c165e');
        $items[9]->setType('question');
        $items[9]->setTitle('question 6');
        $items[9]->setUuid('19b7e5de-8eda-44ba-a75c-5eadedf9921b');
        $items[9]->setImageId(null);
        $items[9]->setResponseType('list');
        $items[9]->setRequired(false);
        $items[9]->setParams([
            'response_set' => '1bf277e2-79fc-4d38-81b5-ca3c8ecbbb9d',
            'multiple_selection' => false,
        ]);
        $items[9]->setCheckConditionsFor([]);
        $items[9]->setCategories([]);
        $items[9]->setNegative(false);
        $items[9]->setNotesAllowed(true);
        $items[9]->setPhotosAllowed(true);
        $items[9]->setIssuesAllowed(true);
        $items[9]->setResponded(false);
        $items[9]->setAnswer('heldddlo wodfdfdfdrld');

        $data['items'] = $items;

        return $data;
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
