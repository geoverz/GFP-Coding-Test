<h1 align="center"> GFP Take Home Coding Test - PHP </h1>
<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Objective:

Create a PHP/Laravel  web app to view a list of issues for a logged in GitHub
user. The specific details for the functionality are provided in the user stories below.



### As a GitHub User
I want to view a list of all open issues which are currently assigned to me
So I can quickly see all my issues
#### Scenario: List all open issues
- Given I have opened the app
and I have open issues assigned to me in a visible GitHub repository
then I should see a list of these issues
and for each issue I should see the issue number, title and when the issue was created

#### Scenario: Scenario: Don't list closed issues
- Given I have opened the app
And I have closed issues assigned to me in a visible GitHub repository
Then I should not see these issues in the list of issues

### As a GitHub User
I want to drill down into the details of a specific issue
So I can read the details of the issue

#### Scenario: Open the details of an issue
- Given I am viewing the issues list
And I have open issues assigned to me in a visible GitHub repository
When I touch on an issue
Then I should be taken to the view issue screen
And I should see the issue number, title, when the issue was created and body
#### Scenario: Navigate back to the issues list
- Given I am viewing the details of an issue
When I touch on the back button
Then I should be taken to the issues list


## Installation
- Clone the repo
- run composer install
- run yarn install
- add your GITHUB_PERSONAL_TOKEN in .env.local (rename .env.local.example to .env.local and .env.example to .env)
- run composer run dev
- register a user
- login to see you github issues
- [Actual video recording](https://jam.dev/c/e347249f-34a0-4668-a45b-f99c3cc45252)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
