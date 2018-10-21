<div class="card grey darken-3 white-text">
    <form action="{{ route("login") }}" method="post">
        {{ csrf_field() }}
    <div class="card-content">
        <span class="card-title"> Login </span>
        <hr>
        <div class="row" style="margin-bottom: 0">
            <div class="input-field col s12">
                <input id="email" type="email" class="validate"  placeholder="Enter your email">
            </div>
        </div>
        <div class="row" style="margin-bottom: 0">
            <div class="input-field col s12">
                <input id="password" type="password" class="validate" placeholder="Enter your password">
            </div>
        </div>

    </div>
    <div class="card-action right-align">
        <button type="submit" class="btn btn-primary blue ">Submit</button>
    </div>
    </form>
</div>
<br>
<div class="card grey darken-3 white-text">
    <div class="card-content">
        <span class="card-title"> Social Media</span>
        <hr>
        <div class="row" style="margin-bottom: 0">
            <div class="input-field col s12">
                <a href="redirect/google" class="btn btn-primary red" style="width: 100%"> Login Via Google </a>
            </div>
        </div>


    </div>
</div>