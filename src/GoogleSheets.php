<?php

namespace Laraditz\GoogleSheets;

use Google\Client;
use Google\Service;
use Illuminate\Support\Collection;

class GoogleSheets
{
    private string $appName;

    private array $scopes;

    private string $accessType;

    private string $authConfig;

    private string $spreadsheetId;

    private Service\Sheets $client;

    public function __construct()
    {
        $this->setAppName(config('google-sheets.app_name'));
        $this->setScopes(config('google-sheets.scopes'));
        $this->setAccessType(config('google-sheets.access_type'));
        $this->setAuthConfig(storage_path(config('google-sheets.auth_config')));

        $client = new Client();
        $client->setApplicationName($this->getAppName());
        $client->setScopes($this->getScopes());
        $client->setAccessType($this->getAccessType());
        $client->setAuthConfig($this->getAuthConfig());

        $this->client = new Service\Sheets($client);
    }

    public function spreadsheet(string $spreadsheetId)
    {
        $this->setSpreadsheetId($spreadsheetId);

        return $this;
    }

    public function get(array $optParams = []): Service\Sheets\Spreadsheet
    {
        try {
            $response = $this->client->spreadsheets->get($this->getSpreadsheetId(), $optParams);

            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function sheet(string $range, array $optParams = []): Collection
    {
        try {
            $response =  $this->client->spreadsheets_values->get($this->getSpreadsheetId(), $range, $optParams);

            return collect($response->getValues());
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function setAppName(string $appName): void
    {
        $this->appName = $appName;
    }

    protected function getAppName(): string
    {
        return $this->appName;
    }

    private function setScopes(array $scopes): void
    {
        $this->scopes = $scopes;
    }

    protected function getScopes(): array
    {
        return $this->scopes;
    }

    private function setAccessType(string $accessType): void
    {
        $this->accessType = $accessType;
    }

    protected function getAccessType(): string
    {
        return $this->accessType;
    }

    private function setAuthConfig(string $authConfig): void
    {
        $this->authConfig = $authConfig;
    }

    protected function getAuthConfig(): string
    {
        return $this->authConfig;
    }

    private function setSpreadsheetId(string $spreadsheetId): void
    {
        $this->spreadsheetId = $spreadsheetId;
    }

    protected function getSpreadsheetId(): string
    {
        return $this->spreadsheetId;
    }
}
