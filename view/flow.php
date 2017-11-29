 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<main>


  <div class="card card-opportunity mx-auto my-3">

    <!-- TODO : make a 404 page if user tries to access flow.php whereas not connected -->

    <div class="card-body">
        <div class="flow-success card-title"></div>
        <div class="flow-dashboard card-block" id="flow-dashboard">
        </div>
      <nav class="navbar navbar-light bg-white">
        <button class="navbar-toggler bg-primary plusminus" type="button" data-toggle="collapse" data-target="#opportunity" aria-controls="opportunity" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
        </button>
        <span class="mr-auto ml-3">Add new opportunity</span>

        <div class="collapse navbar-collapse" id="opportunity">

          <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
               <label for="opp-name">Opportunity name</label>
               <input type="text" class="form-control" name="opp-name"  placeholder="">
               <small id="dptHelp" class="form-text text-muted">You can give it a name</small>
            </div>

            <div class="form-group">
               <label for="opp-link">Link (if published online)</label>
               <input type="text" class="form-control" name="opp-link"  placeholder="http://www...">
               <!-- <small id="dptHelp" class="form-text text-muted">You can give it a name</small> -->
            </div>

            <div class="row">
              <div class="form-group col-md-12">
                  <input type="checkbox" name="opp-intref" aria-label="Checkbox for following text input">
                  <label for="opp-intref">I already applied, on <input type="date" class="form-control" name="opp-appdate" aria-describedby="appdateHelp">
                  </label>
              </div>
              <!-- <div class="form-group col-md-8">
                <input type="date" class="form-control" name="opp-appdate" aria-describedby="appdateHelp">
              </div> -->
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                 <label for="opp-company">Company</label>
                 <input type="text" class="form-control" name="opp-company" placeholder="" required>
              </div>
              <div class="form-group col-md-6">
                 <label for="opp-industry">Industry</label>
                 <select class="btn btn-primary form-control" name="opp-industry">
                   <option value="1">Accounting, Finance, Insurance</option>
                   <option value="2">Marketing, Communication</option>
                   <option value="3">IT</option>
                   <option value="4">Electrical, Environment</option>
                   <option value="5">Healthcare</option>
                   <option value="6">Food, Catering</option>
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
               <label for="opp-role">Role</label>
               <input type="text" class="form-control" name="opp-role"  placeholder="" required>
            </div>

            <div class="row">
              <div class="form-group col-md-7">
                 <label for="opp-department">Department</label>
                 <input type="text" class="form-control" name="opp-department" aria-describedby="dptHelp" placeholder="">
                 <small id="dptHelp" class="form-text text-muted">Leave blank if unknown</small>
              </div>
              <div class="form-group col md-5">
                 <label for="opp-location">Location</label>
                 <input type="text" class="form-control" name="opp-location" placeholder="">
              </div>
            </div>

            <div class="form-group">
                <input type="checkbox" name="opp-intref" aria-label="Checkbox for following text input">
                <label for="opp-intref">Do you benefit from a internal reference ?</label>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                  <label for="opp-stage">Stage</label>
                  <select class="btn btn-primary btn-stage form-control" name="opp-stage">
                    <option value="1">Online application</option>
                    <option value="2">First job interview</option>
                    <option value="3">Second job interview</option>
                    <option value="4">Short selection</option>
                    <option value="5">Contract signature</option>
                    <option value="6">Job secured</option>
                  </select>
                 </div>

                 <div id="successRate" class="form-group col-md-4">
                   <label for="opp-successrate">Success rate</label>
                   <input type="text" class="form-control" name="opp-successrate" aria-describedby="successrateHelp" placeholder="" value="3%">
                 </div>

                 <div class="form-group col-md-4">
                   <label for="opp-candidates">Number of remaining applicants</label>
                   <input type="text" class="form-control" aria-describedby="candidatesHelp" name="opp-candidates" placeholder="">
                   <small id="candidatesHelp" class="form-text text-muted">Leave blank if unknown</small>
                 </div>
              </div>

             <div class="row">
                 <div class="form-group col-md-6">
                   <label for="opp-creadate">Application release date :</label>
                   <input type="date" class="form-control" name="opp-creadate" aria-describedby="datestartHelp">
                   <small id="datestartHelp" class="form-text text-muted"> Leave blank if unknown</small>
                 </div>

                 <div class="form-group col-md-6">
                   <label for="opp-enddate">Application estimated closing date :</label>
                   <input type="date" class="form-control" name="opp-enddate" aria-describedby="dateendHelp">
                   <small id="dateendHelp" class="form-text text-muted"> Leave blank if unknown</small>
                 </div>
             </div>


             <div class="text-center">
               <input type="submit" class="btn btn-success col-md-6 center-block mx-auto" name="opp-submit" value="Add">
             </div>

           </form>
        </div>
      </nav>

    </div>


  </div>
</main>
