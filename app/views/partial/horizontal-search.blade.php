<form class="form-horizontal" role="form" action="{{ action('SearchController@show') }}" method="get">
        <label for="type" class="col-lg-2 col-md-2 control-label">I need a</label>
        <div class="col-lg-3 col-md-3">
            <select class="form-control " name="type" required="required" id="type">
                <option value="coworking">Coworking space</option>
                <option value="desk">Desk space</option>
                <option value="meeting-room">Meeting room</option>
            </select>
        </div>
        <label for="location" class="col-lg-1 col-md-1 control-label">in</label>
        <div class="col-lg-3 col-md-3" style = "margin-bottom:20px;">
            <input type="text" class="form-control " name="location" id="location" placeholder="Location" required="required" autofocus="autofocus">
        </div>
        <div class = "col-lg-3 col-md-3">
            <button type="submit" class="btn btn-block btn-warning ">Go</button>
        </div>
</form>