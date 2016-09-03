<!--Driver Create Modal start-->
    <div aria-hidden="true" aria-labelledby="driverLabel" role="dialog" tabindex="-1" id="driver-create-modal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">New Driver</h4>
              </div>
              <div class="modal-body">

                  <form class="form-horizontal modal-form" role="form" action="{{ route('driver.new') }}" method="post">
                      <div class="form-group">
                          <label for="driver-name" class="col-lg-2 control-label">Name *</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" id="driver-name" name="name" placeholder="Name">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="driver-id" class="col-lg-2 control-label">ID No</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" id="driver-id" name="id_no" placeholder="Driver ID">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="driver-phone" class="col-lg-2 control-label">Phone No</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" id="driver-phone" name="phone" placeholder="Phone No">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="driver-phone" class="col-lg-2 control-label">Company</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" id="driver-company" name="company" placeholder="Company">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-info">Save</button>
                          </div>
                      </div>
                      <input type="hidden" name="_token" value="{{ Session::token() }}" />
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!--Driver Create Modal End-->