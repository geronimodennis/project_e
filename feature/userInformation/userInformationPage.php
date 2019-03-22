<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form method="post">
                    <div class="form-group ">
                        <label class="control-label requiredField" style="width: 100%" for="name">
                            Name ML, Surname
                            <span class="asteriskField">*</span>
                        </label>
                        <input class="form-control d-inline-block" style="width: 40%" id="firstName" name="firstName" type="text"/>
                        <input class="form-control d-inline-block" style="width: 18%" id="midName" name="midName" type="text"/>
                        <input class="form-control d-inline-block" style="width: 40%" id="lastName" name="lastName" type="text"/>
                    </div>
                    <div class="form-group ">
                        <label class="control-label requiredField" for="email">
                            Email
                            <span class="asteriskField">*</span>
                        </label>
                        <input class="form-control" id="email" name="email" type="text"/>
                    </div>
                    <div class="form-group ">
                        <label class="control-label " for="subject">
                            Subject
                        </label>
                        <input class="form-control" id="subject" name="subject" type="text"/>
                    </div>
                    <div class="form-group ">
                        <label class="control-label " for="message">
                            Message
                        </label>
                        <textarea class="form-control" cols="40" id="message" name="message" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div>
                            <button class="btn btn-primary " name="submit" type="submit">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>