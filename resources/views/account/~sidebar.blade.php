        <div class="col-md-3 col-sm-3">
          <div class="left-menu-profile">
            <div class="avatar-upload">
                      <div class="avatar-edit">
                    <!--    <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg"> -->
                        <label for="imageUpload"></label>
                      </div>
                      <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url({{ asset('images/profile-img-01.jpg')}}) ;">
                        </div>
                      </div>
            </div>

            <div class="name-profile-author">
                      <h3>Name: <span>Alizbath</span></h3>

                      <div class="menu-profile-list">
                        <ul>
                          <li><a href="{{ url('account') }}">Profile</a></li>
                          <li><a href="{{ url('account/upload') }}">Upload Picture</a></li>
                          <li><a href="{{ url('account/friends') }}">Friends</a></li>
                          <li><a href="{{ url('account/password') }}">Password</a></li>
                        </ul>
                      </div>
            </div>
          </div>
        </div>