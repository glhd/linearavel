<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CreateCsvExportReportPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CreateCsvExportReportMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCreateCsvExportReportMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'createCsvExportReport', $args));
	}
	
	public function get(string ...$fields): CreateCsvExportReportPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CreateCsvExportReportMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CreateCsvExportReportMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof CreateCsvExportReportMutationResponse);
		
		return $response;
	}
}
