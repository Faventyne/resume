<main>

  <div class="flow-dashboard">

  </div>


  <div class="card w-75 mx-auto">
    <div class="card-body">
      <nav class="navbar navbar-light bg-white">
        <button class="navbar-toggler bg-primary plusminus" type="button" data-toggle="collapse" data-target="#opportunity" aria-controls="opportunity" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
        </button>
        <span class="mr-auto ml-3">Add new opportunity</span>

        <div class="collapse navbar-collapse" id="opportunity">

          <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-md-6">
                 <label for="company">Company</label>
                 <input type="text" class="form-control" name="company" placeholder="">
              </div>
              <div class="form-group col-md-6">
                 <label for="industry">Industry</label>
                 <select class="btn-primary" name="stage">
                   <option value="1">Accounting, Finance, Insurance</option>
                   <option value="2">Marketing, Communication</option>
                   <option value="3">IT</option>
                   <option value="4">Electrical, Environment</option>
                   <option value="5">Healthcare</option>
                   <option value="6">Catering</option>
                   <option value="7">Logistics, Warehouse</option>
                   <option value="8">Industrial, manufacturing</option>
                   <option value="9">Administrative, Job Office</option>
                   <option value="10">Construction, Real Estate</option>
                   <option value="11">Human Resources, Training</option>
                   <option value="12">Legal</option>
                 </select>
              </div>
            </div>

            <div class="form-group">
               <label for="role">Role</label>
               <input type="text" class="form-control" name="role"  placeholder="  ">
            </div>

            <div class="row">
              <div class="form-group col-md-7">
                 <label for="department">Department</label>
                 <input type="text" class="form-control" name="department" aria-describedby="dptHelp" placeholder="">
                 <small id="dptHelp" class="form-text text-muted">Leave blank if unknown</small>
              </div>
              <div class="form-group col md-5">
                 <label for="location">Location</label>
                 <input type="text" class="form-control" name="location" placeholder="">
              </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                  <label for="stage">Stage</label>
                  <select class="btn btn-primary btn-stage" name="stage">
                    <option value="1">Online application</option>
                    <option value="2">First job interview</option>
                    <option value="3">Second job interview</option>
                    <option value="4">Short selection</option>
                    <option value="5">Contract signature</option>
                    <option value="6">Job secured</option>
                  </select>
                 </div>

                 <div class="form-group col-md-4">
                   <label for="lastname">Success rate</label>
                   <input type="text" class="form-control" name="successRate" placeholder="" value="3%">
                 </div>

                 <div class="form-group col-md-4">
                   <label for="lastname">Number of remaining applicants</label>
                   <input type="text" class="form-control" name="nbCandidates" placeholder="">
                 </div>
              </div>

             <div class="row">
                 <div class="form-group col-md-6">
                   <label for="opp-startdate">Application release date :</label>
                   <input type="date" class="form-control" name="opp-startdate" aria-describedby="datestart">
                   <small id="datestart" class="form-text text-muted"> Leave blank if unknown</small>
                 </div>

                 <div class="form-group col-md-6">
                   <label for="opp-enddate">Application estimated closing date :</label>
                   <input type="date" class="form-control" name="opp-enddate" aria-describedby="dateend">
                   <small id="dateend" class="form-text text-muted"> Leave blank if unknown</small>
                 </div>
             </div>



             <input type="submit" class="btn btn-primary" name="insert_opportunity" value="Add">

           </form>
        </div>
      </nav>
    </div>
  </div>
</main>
