<div class="card grey darken-3 white-text">
    <div class="card-content">
        <span class="card-title"> Register </span>
        <hr>
        <div class="row" style="margin-bottom: 0">
            <div class="input-field col s12">
                <input name="r_name" id="r_name" type="text" class="validate" placeholder="Enter your name">
            </div>
        </div>
        <div class="row" style="margin-bottom: 0">
            <div class="input-field col s12">
                <input name="r_email" id="r_email" type="email" class="validate"  placeholder="Enter your email">
            </div>
        </div>
        <div class="row" style="margin-bottom: 0">
            <div class="input-field col s12">
                <input name="r_phone" id="r_phone" type="number" class="validate" placeholder="Enter your phone">
            </div>
        </div>
        <div class="row" style="margin-bottom: 0">
            <div class="input-field col s12">
                <input name="r_password" id="r_password" type="password" class="validate" placeholder="Enter your password">
            </div>
        </div>
        <div class="row white-text" style="margin-bottom: 0">
            <div class="input-field col s12">
                <select name="r_role" id="r_role">
                    @foreach(App\Model\Role::all() as $role)
                        <option value="{{ $role->id }}"> {{ $role->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="card-action right-align">
        <div class="btn btn-primary blue ">Submit</div>
    </div>
</div>