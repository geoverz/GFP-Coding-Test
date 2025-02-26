<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Objective') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        As a GitHub User
                    </h2>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                    I want to view a list of all open issues which are currently assigned to me <br>
                    So I can quickly see all my issues<br><br>
                    </p>
                    Scenario: List all open issues<br>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                    Given I have opened the app<br>
                    And I have open issues assigned to me in a visible GitHub repository<br>
                    Then I should see a list of these issues<br>
                    And for each issue I should see the issue number, title and when the issue was created<br><br>
                    </p>
                    Scenario: Don't list closed issues<br>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                    Given I have opened the app<br>
                    And I have closed issues assigned to me in a visible GitHub repository<br>
                    Then I should not see these issues in the list of issues<br>
                    </p>
                    <br>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        As a GitHub User
                    </h2>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                    I want to drill down into the details of a specific issue<br>
                    So I can read the details of the issue<br><br>
                    </p>
                    Scenario: Open the details of an issue<br>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                    Given I am viewing the issues list<br>
                    And I have open issues assigned to me in a visible GitHub repository<br>
                    When I touch on an issue<br>
                    Then I should be taken to the view issue screen<br>
                    And I should see the issue number, title, when the issue was created and body<br><br>
                    </p>
                    Scenario: Navigate back to the issues list<br>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                    Given I am viewing the details of an issue<br>
                    When I touch on the back button<br>
                    Then I should be taken to the issues list<br>
                    </p>
                    <div class="flex items-center gap-4">
                    <a
                        href="{{ route('issues.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                        Click here to view issues
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
