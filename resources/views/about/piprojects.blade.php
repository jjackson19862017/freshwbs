<x-home-master>
    @section('content')
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-3">My Pi Projects</h1>

                <div class="card text-center border-success">
                    <div class="card-header">
                        Homebridge
                    </div>
                    <div class="card-body">
                        <p class="card-text text-success">After recieving an Apple Homepod for my Birthday, my current smart devices didn't work with my Homepod.  The Raspberry was converted as a Homebridge so that my devices can be used by my Homepod.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Currently in use
                    </div>
                </div>
                <hr>
                <div class="card text-center border-warning">
                    <div class="card-header">
                        Web-server
                    </div>
                    <div class="card-body">
                        <p class="card-text text-warning">This was a LAMP server, (Linux, Apache, MySQL, and PHP).  This hosted my testing websites before I started doing my Fullstack Developer Course and I learn't about Heroku and Github Pages.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Discontinued, however plan to rebuild
                    </div>
                </div>
                <hr>
                <div class="card text-center border-danger">
                    <div class="card-header">
                        Wordpress Server
                    </div>
                    <div class="card-body">
                        <p class="card-text text-danger">This was researched on Youtube, originally called 'Blog-in-a-box'.  I went down this route because all the tutorials I found would fail and after a week of trying to get my Raspberry Pi to run the Wordpress Server in a stable state.  My brother is a Handyman and while he is not tech savvy, I thought he and his wife could use this to promote his business.  He could of used it for testimonials from customers and shown before and after pictures of all his jobs.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Brother never used it
                    </div>
                </div>
                <hr>
                <div class="card text-center border-success">
                    <div class="card-header">
                        File Server
                    </div>
                    <div class="card-body">
                        <p class="card-text text-success">This has been running for over two months, it has a 2TB hard drive attached to it.  I use it to sort files that need to be accessed from different types of devices (iPad, MacBook, Android Phone).  So for example I take screen recordings on my mobile phone, I then would transfer them to the fileserver so that I can edit them on my MacBook.  I also have docker installed on it and used to have Pi-Hole Ad Blocker on it.  However this slowed my network down and I disabled the Ad Blocker.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Currently in use
                    </div>
                </div>
                <hr>
                <div class="card text-center border-success">
                    <div class="card-header">
                        Retro Game Emulator
                    </div>
                    <div class="card-body">
                        <p class="card-text text-success">I was feeling nostalgic so I downloaded 'RecalBox', this allowed me to play Sega Mega Drive and Snes Games.  I linked my X-Box One Controller via Bluetooth and I could play some childhood games.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Currently in use
                    </div>
                </div>
                <hr>
                <div class="card text-center border-danger">
                    <div class="card-header">
                        Media Player (KODI)
                    </div>
                    <div class="card-body">
                        <p class="card-text text-danger">While having a standard TV in my bedroom, I installed Kodi onto a Pi.  I linked it to my fileserver so I was not limited by the limited space on the SD card inside the Raspberry Pi.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Not used as moving house
                    </div>
                </div>
                <hr>
                <div class="card text-center border-warning">
                    <div class="card-header">
                        Advertising Platform
                    </div>
                    <div class="card-body">
                        <p class="card-text text-warning">My current place of work has a television in the Bar Area that is not utilized to its fullest, so I made use of the TVs in the bar area as a form of an advertising tool for the two hotels. I created a computer package which included photographs of the hotel facilities and information on up and coming events for the two hotels.  This was successful as it increased revenue in both hotels as people were not aware that they had a sister hotel with a function suite. I have recently downsized to a smaller ‘Raspberry Pi Zero’. The advantage of running a ‘Raspberry Pi Zero’ is that I can use the power from the TV USB and have no unsightly wires showing.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Discontinued for the moment as I am looking to improve it
                    </div>
                </div>
                <hr>

            </div>
        </section>
        <hr class="m-0" />


    @endsection
</x-home-master>
