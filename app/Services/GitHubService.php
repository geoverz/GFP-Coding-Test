<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    protected $apiUrl = 'https://api.github.com';

    public function __construct()
    {
        $this->token = env('GITHUB_PERSONAL_TOKEN');
    }

    public function getUserIssues($repository = null, $sort = 'desc')
    {
        $response = Http::withToken($this->token)->get("{$this->apiUrl}/issues");

        if ($response->failed()) {
            return [];
        }

        $issues = collect($response->json())->filter(function ($issue) {
            return $issue['state'] === 'open';
        });

        // I will try to add filters
        if ($repository) {
            $issues = $issues->filter(function ($issue) use ($repository) {
                return $issue['repository']['full_name'] === $repository;
            });
        }

        // Sort by created date
        return $issues->sortBy('created_at', SORT_REGULAR, $sort === 'desc')->values()->toArray();
    }

    public function getIssueDetails($issueNumber, $repoFullName)
    {
        $response = Http::withToken($this->token)->get("{$this->apiUrl}/repos/{$repoFullName}/issues/{$issueNumber}");

        return $response->successful() ? $response->json() : null;
    }
}
