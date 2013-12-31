<?php

namespace Tests\Unit\Analytics;

use App\Modules\Analytics\AnalyticsFactory;
use App\Modules\Shared\DTO\RequestLogTransfer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AnalyticsRetrieverTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var AnalyticsFactory
     */
    protected AnalyticsFactory $factory;

    public function setUp(): void
    {
        parent::setUp();

        $this->factory = new AnalyticsFactory();

        // seed the database
        $this->artisan('db:seed');
    }

    /**
     * Test retrieve analytics.
     *
     * @return void
     */
    public function test_retrieve_analytics()
    {
        $result[0] = new RequestLogTransfer();
        $result[0]->setName('form.store');
        $result[0]->setPath('/form');
        $result[0]->setMethod('POST');
        $result[0]->setHits(0);

        $result[1] = new RequestLogTransfer();
        $result[1]->setName('form.get');
        $result[1]->setPath('/form');
        $result[1]->setMethod('GET');
        $result[1]->setHits(0);

        $result[2] = new RequestLogTransfer();
        $result[2]->setName('form.storeQuestionnaire');
        $result[2]->setPath('/questionnaire');
        $result[2]->setMethod('POST');
        $result[2]->setHits(0);

        $analytics = $this->factory->createAnalyticsRetriever()
            ->get([]);

        $this->assertEquals($analytics->toArray(), $result);
        $this->assertDatabaseCount('request_logs', 3);
    }

    /**
     * Test retrieve analytics filter by method and endpoint.
     *
     * @return void
     */
    public function test_retrieve_analytics_filter_by_method_and_endpoint()
    {
        $result[0] = new RequestLogTransfer();
        $result[0]->setName('form.storeQuestionnaire');
        $result[0]->setPath('/questionnaire');
        $result[0]->setMethod('POST');
        $result[0]->setHits(0);

        $data = [
            'endpoint' =>  '/questionnaire',
            'method' =>  'POST',
        ];

        $analytics = $this->factory->createAnalyticsRetriever()
            ->get($data);

        $this->assertEquals($analytics->toArray(), $result);
    }

    /**
     * Test retrieve analytics filter by method.
     *
     * @return void
     */
    public function test_retrieve_analytics_filter_by_method()
    {
        $result[0] = new RequestLogTransfer();
        $result[0]->setName('form.store');
        $result[0]->setPath('/form');
        $result[0]->setMethod('POST');
        $result[0]->setHits(0);

        $result[1] = new RequestLogTransfer();
        $result[1]->setName('form.storeQuestionnaire');
        $result[1]->setPath('/questionnaire');
        $result[1]->setMethod('POST');
        $result[1]->setHits(0);

        $data = [
            'method' =>  'POST',
        ];

        $analytics = $this->factory->createAnalyticsRetriever()
            ->get($data);

        $this->assertEquals($analytics->toArray(), $result);
    }


    /**
     * Test retrieve analytics filter by endpoint.
     *
     * @return void
     */
    public function test_retrieve_analytics_filter_by_endpoint()
    {
        $result[0] = new RequestLogTransfer();
        $result[0]->setName('form.storeQuestionnaire');
        $result[0]->setPath('/questionnaire');
        $result[0]->setMethod('POST');
        $result[0]->setHits(0);

        $data = [
            'endpoint' =>  '/questionnaire',
        ];

        $analytics = $this->factory->createAnalyticsRetriever()
            ->get($data);

        $this->assertEquals($analytics->toArray(), $result);
    }
}
