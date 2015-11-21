<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand  cpt-details" href="#">
           <input type="text" class="form-control"  ng-model="postMeta.cp_general_name[0]" placeholder="Content type general name" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active cpt-details"><input type="text" class="form-control"  ng-model="postMeta.cp_singular_name[0]" placeholder="Content type singular name"/></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container cpt"  ng-app="app" ng-controller="DemoController">
    <form ng-submit="processForm()">
        <div class="row">
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-12">
                          <div class="col-sm-1">
                        <div fb-components></div>
                          </div>
                          <div class="col-sm-11">
                                <div fb-builder="default"></div>
                          </div>
                    </div>
                    <div class="col-sm-12">
                        <div ng-model="input" fb-form="default" fb-default="defaultValue"></div>
                    </div> 
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label><input type="checkbox" ng-model="isShowScope" />
                                Show scope
                            </label>
                        </div>
                        <pre ng-if="isShowScope">{{form}}</pre>

                        <input name="cp_form_builder" ng-if="isShowScope" value="{{form}}"  ng-model="postMeta.cp_form_builder[0]" style="display:block;" />

                        <div class="checkbox">
                            <label><input type="checkbox" ng-model="isShowScope" ng-init="isShowScope=true" />
                                Show scope
                            </label>
                        </div>
                        <pre ng-if="isShowScope">{{input}}</pre>
                          </div>
                    </div>
            </div>
            <div class="col-sm-2 ">
                <input type="hidden" name="cpt-hidd" value="true" />
              
                <input type="submit"  class="btn btn-default"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12"></div>
        </div>
    </form>
</div>



