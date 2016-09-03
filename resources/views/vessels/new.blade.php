    <!--Vessel Create Modal start-->
    <div aria-hidden="true" aria-labelledby="vesselLabel" role="dialog" tabindex="-1" id="vessel-create-modal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Create Vessel</h4>
              </div>
              <div class="modal-body">

                  <form class="form-horizontal modal-form" role="form" action="{{ Route('vessel.new') }}">
                      <div class="form-group">
                          <label for="vessel-IMO" class="col-lg-2 control-label">IMO</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" name="imo" placeholder="IMO">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="vessel-name" class="col-lg-2 control-label">Name</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" id="vessel-name" name="name" placeholder="Vessel Name">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-info" id="vessel-save">Save</button>
                          </div>
                      </div>
                      <input type="hidden" name="_token" value="{{ Session::token() }}" />
                  </form>
              </div>

          </div>
      </div>
  </div>
    <!--Vessel Create Modal end-->