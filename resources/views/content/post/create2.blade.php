
<html>
    <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Laravel 5.8 - Client Side Form Validation using Parsleys.js</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <script src="http://parsleyjs.org/dist/parsley.js"></script>
     <style>
     .box
     {
      width:100%;
      max-width:600px;
      background-color:#f9f9f9;
      border:1px solid #ccc;
      border-radius:5px;
      padding:16px;
      margin:0 auto;
     }
     input.parsley-success,
     select.parsley-success,
     textarea.parsley-success {
       color: #468847;
       background-color: #DFF0D8;
       border: 1px solid #D6E9C6;
     }

     input.parsley-error,
     select.parsley-error,
     textarea.parsley-error {
       color: #B94A48;
       background-color: #F2DEDE;
       border: 1px solid #EED3D7;
     }

     .parsley-errors-list {
       margin: 2px 0 3px;
       padding: 0;
       list-style-type: none;
       font-size: 0.9em;
       line-height: 0.9em;
       opacity: 0;

       transition: all .3s ease-in;
       -o-transition: all .3s ease-in;
       -moz-transition: all .3s ease-in;
       -webkit-transition: all .3s ease-in;
     }

     .parsley-errors-list.filled {
       opacity: 1;
     }

     .parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length{
      color:#ff0000;
     }
.form-group{
    height: 80px
}
     </style>

    </head>
    <body>
     <div class="container">
        <br />
        <h3 align="center">Laravel 5.8 - Client Side Form Validation using Parsleys.js</h3>
        <br />
        <div class="box">
       <form id="validate_form">
        @CSRF
        <div class="row">


            <div class="col-md-6">
                <div class="form-group">
                    <label for="add_company_id">Bank: <span class="require-field-label">*</span></label>
                    <select name="add_bank_id" id="add_bank_id"
                    class="form-control parsley-unique"
                    data-parsley-trigger="change"
                    data-parsley-required
                    data-parsley-required-message="Bank is required"
                    data-parsley-maxlength="50"
                    data-parsley-maxlength-message="Maximum length of Bank is 50"
                    data-title="bankBranchInfo">
                        <option value="">Select Bank</option>
                        <option value="dd">Select Bank</option>
                        <option value="dd">Select Bank</option>
                        <option value="dd">Select Bank</option>

                    </select>
                    @error('add_bank_id')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="add_email_address">Email: </label>
                    <input type="email" name="add_email_address"
                    id="add_email_address"
                    class="form-control parsley-unique"
                    data-parsley-trigger="keyup"
                    data-parsley-type="email"
                    data-parsley-required
                    data-parsley-required-message="Email is required"
                    data-parsley-maxlength="50"
                    data-parsley-maxlength-message="Maximum length of Email is 50"
                    data-title="bankBranchInfo">
                    @error('add_email_address')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_seq_number">Sequence Number tt: <span
                            class="require-field-label">*</span></label>
                    <input type="number" name="seq_number"
                        value=""
                        id="edit_seq_number" class="form-control"
                        class="form-control parsley-unique-sequence"
                        data-parsley-trigger="change"
                        data-parsley-type="number"
                        data-parsley-required
                        data-parsley-required-message="Sequence Number is required"
                        data-parsley-maxlength="15"
                        data-parsley-maxlength-message="Maximum length of Sequence Number is 15"
                        data-title="bankInfo"
                        data-id="">
                </div>
            </div>




            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_seq_number">Sequence Number: <span
                            class="require-field-label">*</span></label>
                    <input type="number" name="seq_number"
                        id="edit_seq_number"
                        value=""
                        class="form-control parsley-unique-sequence"
                        data-parsley-trigger="change"
                        data-parsley-type="number"
                        step="0.01"
                        data-parsley-required
                        data-parsley-required-message="Sequence Number is required"
                        data-parsley-maxlength="50"
                        data-parsley-maxlength-message="Maximum length of Sequence Number is 50"
                        data-title="commisionerRateInfo"
                        data-id="">
                    @error('seq_number')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>




            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_seq_number">Sequence Number: <span
                            class="require-field-label">*</span></label>
                    <input type="number" name="seq_number"
                        id="edit_seq_number"
                        value=""
                        class="form-control parsley-unique-sequence"
                        data-title="challanType"
                        data-parsley-trigger="change"
                        step="0.000001"
                        data-parsley-type="number"
                        data-parsley-required
                        data-parsley-required-message="Sequence Number is required"
                        data-parsley-maxlength="50"
                        data-parsley-maxlength-message="Maximum length of Sequence Number is 50"
                        data-id="">
                    @error('seq_number')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>



         <div class="col-xs-6 my-3">

          <div class="form-group">
           <label>float check     max 20</label>
           <input type="number" name="number" id="first_name" class="form-control"
            data-parsley-trigger="change"
            data-parsley-type="number" step="0.01"
            placeholder="Enter type"
            data-parsley-required
            data-parsley-required-message="type is required"
            data-parsley-maxlength="20"
            data-parsley-maxlength-message="Minimum length of type name is 20"
            data-parsley-focus="first"/>
          </div>
         </div>

         <div class="col-xs-6 my-3">
          <div class="form-group">
           <label>float check  Minimum 5, max 20</label>
           <input type="number" name="number" id="first_name" class="form-control"
            data-parsley-trigger="change"
            data-parsley-type="number" step="0.01"
            placeholder="Enter type"
            data-parsley-required
            data-parsley-required-message="type is required"
            data-parsley-maxlength="20"
            data-parsley-maxlength-message="maxlength length of type name is 20"
            data-parsley-minlength="5"
            data-parsley-minlength-message="Minimum length of type name is 5"
            data-parsley-focus="first"/>
          </div>
         </div>

         <div class="col-xs-6 my-3">
          <div class="form-group">
           <label>float check </label>
           <input type="number" name="number" id="first_name" class="form-control"
            data-parsley-trigger="focusout"
            data-parsley-type="number" step="0.0001"
            placeholder="Enter type"
            data-parsley-required
            data-parsley-required-message="type is required"
            data-parsley-maxlength="20"
            data-parsley-maxlength-message="Minimum length of type name is 20"
            data-parsley-minlength="9"
            data-parsley-minlength-message="Minimum length of type name is 9"
            data-parsley-focus="first"/>
          </div>
         </div>

         <div class="col-xs-6 my-3">
          <div class="form-group">
           <label>float check </label>
           <input type="number" name="number" id="first_name" class="form-control"
            data-parsley-trigger="focus"
            data-parsley-type="number" step="0.0001"
            placeholder="Enter type"
            data-parsley-required
            data-parsley-required-message="type is required"
            data-parsley-maxlength="20"
            data-parsley-maxlength-message="Minimum length of type name is 20"
            data-parsley-minlength="9"
            data-parsley-minlength-message="Minimum length of type name is 9"
            data-parsley-focus="first"/>
          </div>
         </div>
         <div class="col-xs-6">
          <div class="form-group">
           <label>First Name</label>
           <input type="text" name="first_name" id="first_name" class="form-control" data-parsley-validate-if-empty placeholder="Enter First Name"
             data-parsley-required-message="first_name is required" data-parsley-focus="first" data-parsley-ui-enabled="true" required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" />
          </div>
         </div>
         <div class="col-xs-6">
          <div class="form-group">
           <label>Last Name</label>
           <input type="text" name="last_name" id="last_name" class="form-control"
           data-parsley-required-message="last_name is required" data-parsley-error-message="last_name error"
            placeholder="Enter Last Name" required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" />
          </div>
         </div>
        </div>
        <div class="form-group">
         <label>Email</label>
         <input type="text" name="email" id="email" class="form-control" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup" />
        </div>
        <div class="form-group">
         <label for="password">Password</label>
         <input type="password" name="password" id="password" class="form-control" placeholder="Password" required data-parsley-length="[8,16]" data-parsley-trigger="keyup" />
        </div>
        <div class="form-group">
         <label>Confirm Password</label>
         <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required data-parsley-equalto="#password" data-parsley-trigger="keyup" />
        </div>
        <div class="form-group">
         <label>Website</label>
         <input type="text" name="website" id="website" class="form-control" data-parsley-type="url" data-parsley-trigger="keyup" />
        </div>
        <div class="form-group">
         <div class="checkbox">
          <label> <input type="checkbox" name="check_rules" id="check_rules" required />I Accept the Terms & Conditions</label>
         </div>
        </div>
        <div class="form-group">
         <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success" />
        </div>

       </form>

      </div>
     </div>
    </body>
   </html>
   <script>
   $(document).ready(function(){

    $('#validate_form').parsley();

    $('#validate_form').on('submit', function(event){
     event.preventDefault();

     if($('#validate_form').parsley().isValid())
     {
      $.ajax({
       url: '{{ route("post.store") }}',
       method:"POST",
       data:$(this).serialize(),
       dataType:"json",
       beforeSend:function()
       {
        $('#submit').attr('disabled', 'disabled');
        $('#submit').val('Submitting...');
       },
       success:function(data)
       {
        $('#validate_form')[0].reset();
        $('#validate_form').parsley().reset();
        $('#submit').attr('disabled', false);
        $('#submit').val('Submit');
        alert(data.success);
       }
      });
     }
    });

   });
   </script>
