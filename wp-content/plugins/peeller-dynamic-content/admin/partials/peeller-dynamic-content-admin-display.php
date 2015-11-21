<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       peeller.com
 * @since      1.0.0
 *
 * @package    Peeller_Dynamic_Content
 * @subpackage Peeller_Dynamic_Content/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!doctype html>
<html ng-app="app" ng-view>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>test</title>
 

</head>
<body class="container" ng-controller="DemoController">
    <div class="row">
        <h1>test</h1>
        <hr/>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Builder</h3>
                </div>
                <div fb-builder="default"></div>
                <div class="panel-footer">
                    <div class="checkbox">
                        <label><input type="checkbox" ng-model="isShowScope" />
                        s
                        </label>
                    </div>
                    <pre ng-if="isShowScope">{{form}}</pre>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div fb-components></div>
        </div>
    </div>

    <div class="row">
        <h2>Form</h2>
        <hr/>
        <form class="form-horizontal">
            <div ng-model="input" fb-form="default" fb-default="defaultValue"></div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <input type="submit" ng-click="submit()" class="btn btn-default"/>
                </div>
            </div>
        </form>
        <div class="checkbox">
            <label><input type="checkbox" ng-model="isShowScope" ng-init="isShowScope=true" />
                Show scope
            </label>
        </div>
        <pre ng-if="isShowScope">{{input}}</pre>
    </div>

    <div class="row">
        <div class="col-md-12 footer"></div>
    </div>

</body>
</html>
