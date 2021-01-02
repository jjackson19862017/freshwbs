<x-home-master>
    @section('content')
        <!-- Information about the Applications I have built -->
            <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-3">My Applications</h1>
                <div class="card text-center">
                    <div class="card-header">
                        Wedding Booking System
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Using Laravel &amp PHP</h5>
                        <p class="card-text">While learning PHP, I thought to cement the learning process that I should try and convert my previous project 'Wedding & Revenue Tracker'.  So that it ran from a database, and had better useability then just a row in Microsoft Excel.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Currently in development
                    </div>
                </div>
                <hr>
                <div class="card text-center">
                    <div class="card-header">
                        Wedding & Revenue Tracker
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Microsoft Excel</h5>
                        <p class="card-text">I was asked by the owners of The Shard and The Mill at Conder Green, to look into designing and building a system that they could use to help with Weddings and Functions.The brief was to create a system that could record and track any wedding or function that had enquired or booked. I recommended doing it in Microsoft Access, as what they wanted was a database. However they did not want to spend the extra money, so I said that I could use Microsoft Excel. I achieved my goal of creating a viable system. I created a dashboard so that the owners could see the current years revenue, I also built in a three year plan so that they could see the potential revenue. The function spreadsheets allows the owners and manager to track each event by name and date. I used conditional cells to highlight problems from the date calculations. For example, if there was data missing from the records the cells would turn red, if everything was ok it would be green. At a glance this would help highlight any issues to the manager or owners, for example if a payment date had been missed.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Completed project in one week
                    </div>
                </div>
                <hr>
                <div class="card text-center">
                    <div class="card-header">
                        Weekly Food Order
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Microsoft Access</h5>
                        <p class="card-text">While I was going about my usual activity, I noticed one day that the Manager of a Kitchen prints out a Microsoft Access Report to tell his kitchen employees how much of each product to send where. I thought I could improve this report by adding more details onto the report to make people collecting the food easier. I offered to look at a Database he had written with limited knowledge, however I had limited knowledge of Microsoft Access myself. I had an idea to create a database from stratch, so I designed a database on paper and then converted that into a working database.  I started developing the database, with learning new things all the time. For example I created fifty-six reports in the beginning, but I found it very time consuming to change each report, when I wanted to change something. My solution to this was to create a reports for lunch and one for tea. I then created a switchboard with buttons and a macro written in Visual Basic. Each button would pass parameters, to the new report. For example, if you clicked the button that said 'Week One Monday Lunch', it would open a report that showed you Week One Monday Lunch. This also fixed a bug that was found in Microsoft Access that doesn't always update report information. After I completed the basic database and it was functional, I started upgrading it using Macros and Visual Basic to automate and make a better UI.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Completed in 2010, One month for the prototype, another month for improvements
                    </div>
                </div>
                <hr>
                <div class="card text-center">
                    <div class="card-header">
                        Recipe & Budget Database
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Microsoft Access</h5>
                        <p class="card-text">While working on 'Weekly Food Order' database, I was asked to generate another database.  This one was for recipes and costings. Recipes went missing and were written down, so the Manager wanted somewhere where he could print them out if needed. The second function of this was to cost the recipe.  So he could see how much, for example a 'Chicken Curry Dish' would cost to make for say 400 people. He could then see how much he had to spend. So I had to take information from the supplier and put it into a table, and then use the data from the recipes to work out a costing total.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Completed project in one week
                    </div>
                </div>
            </div>
        </section>
        <hr class="m-0" />
    @endsection
</x-home-master>
