<div class="background">
    <h1 class="page-title">Dashboard</h1>
    <p class="welcome">Hey {{ auth()->user()->first_name }}! Take your time and enjoy your statistics</p>
    <div class="stats boxes">
        <div class="stat box">
            <h2 class="section-title">Total Links</h2>
            <p>{{ $shortens->count(); }}</p>
        </div>
        <div class="stat box">
            <h2 class="section-title">Total Link Visits</h2>
            <p>{{ $total_visits }}</p>
        </div>
        <div class="stat box">
            <h2 class="section-title">Most Visited Link</h2>
            <a class="most-visited short" href={{ $domain . $most_visited->short }}>{{ $domain . $most_visited->short }}</a>
            <a class="most-visited long" href={{ $most_visited->long }}> {{ $most_visited->long }}</a>
        </div>
    </div>

    <div class="links">
        <h2 class="title">Your Links</h2>
        @foreach ($shortens as $short)
            <div class="link-container">
                <div class="link">
                    <p>
                        <span class="short">{{ $domain . $short->short }}</span>
                        <span class="long">{{ $short->long }}/span>
                    </p>
                </div>
                <div class="options">
                    <button>Delete</button>
                </div>
            </div>
        @endforeach
    </div>


</div>


<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Nunito', sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .background {
        background: conic-gradient(from 90deg at 50% 0%, #111827, 50%, #3d3d3d, #111827);
        height: 100vh;
    }

    .page-title {
        /* text-align: center; */
        margin: 0;
        padding-top: 50px;
        font-size: 3em;
        font-weight: 700;
    }

    .page-title, .welcome {
        color: white;
        margin-left: 100px;
    }

    .welcome {
        margin-bottom: 50px;
    }

    .stats.boxes {
        display: flex;
        margin: 0 50px 0 50px;
    }

    @media (max-width: 900px) {
        .page-title, .welcome {
            margin-left: 0;
            text-align: center;
        }

        .stats.boxes {
            flex-direction: column;
        }
    }

    .stat.box {
        padding: 20px;
        border-radius: 15px;
        /* background-color: #d7daff; */
        background-color: white;
        box-shadow: 0 0 10px rgba(178, 196, 255, 0.192);
        margin: 10px;
        flex-basis: 100%;
    }

    .stat.box > p {
        font-size: 2em;
        font-weight: bold;
        background: rgb(42, 115, 199);
        padding: 20px 0;
        margin: 0;
        border-radius: 10px;
        color: white;
    }

    .stat.box > .section-title, .stat.box > p {
        text-align: center;
    }

    .stat > .section-title {
        margin-top: 0;
        margin-bottom: 15px;
    }

    .most-visited {
        font-size: 1.1em;
        margin: 0;
        margin-bottom: 5px;
        text-align: center;
        width: 100%;
        display: block;
        border-radius: 5px;
        padding: 10px 10px;
        color: #ffffff;
        text-decoration: none;
        font-weight: bold;
    }

    .most-visited.long {
        background-color: #4caf50;
        font-size: 0.9em;
        padding: 5px 10px 10px 10px;
    }

    .most-visited.short {
        background-color: rgb(42, 115, 199);
    }



    .links {
        margin: 10px 60px;
        /* background-color: #d7daff; */
        background-color: white;
        border-radius: 15px;
        padding: 20px;
    }

    .links > .title {
        margin-top: 0;
    }


    .link-container {
        display: flex;
        flex-direction: row;
        align-items:center;
        justify-content: space-between;
        width: 100%;
        margin-top: 10px;
        border-bottom: 2px solid rgb(42, 115, 199);
    }

    .link {
        color: white;
        padding: 10px 0;
        font-weight: bold;
        font-size: 1.2em;
    }

    .link > p {
        margin: 5px 0;
    }

    .options {

    }

    .link .short, .link .long {
      background-color: #4caf50;
      padding: 5px 10px;
      border-radius: 10px;
    }

</style>
