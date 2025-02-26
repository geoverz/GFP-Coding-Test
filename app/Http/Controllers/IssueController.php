<?php

namespace App\Http\Controllers;

use App\Services\GitHubService;
use Illuminate\Http\Request;
use Parsedown;

class IssueController extends Controller
{
    protected $githubService;

    public function __construct(GitHubService $githubService)
    {
        $this->githubService = $githubService;
    }

    public function index(Request $request)
    {
        $repository = $request->query('repository');
        $sort = $request->query('sort', 'desc'); // Default to newest first
        $issues = $this->githubService->getUserIssues($repository, $sort);
        // Get a unique list of repositories for the dropdown
        $repositories = collect($issues)->pluck('repository.full_name')->unique()->values();

        return view('issues.index', compact('issues', 'repositories', 'repository', 'sort'));
    }

    public function show( $owner, $repo, $id)
    {
        $issue = $this->githubService->getIssueDetails($id, "$owner/$repo");
        if (!$issue) {
            return redirect()->route('issues.index')->with('error', 'Issue not found.');
        }
        // Convert Markdown to HTML
        $parsedown = new Parsedown();
        $issue['body'] = $parsedown->text($issue['body']);
        return view('issues.show', compact('issue'));
    }
}
