
# Egg Stack
*by Julac Ontina*

This framework is based on the Controller-Domain-Repository-Service (CDRS) framework or structure found in Java Spring Boot.
It is meant to replace Softboiled-MVC as the Model-Controller-View (MVC) was found able to be further separated into more parts increasing clarity and modularity in the systems developed with the CDRS framework.

## Other frameworks built in:
* [Shell CSS](https://github.com/eneioarzew/shell-css)

## Framework notes:
URI length (in a local environment) is usually up to 4 when URI array in root index file is counted with PHP count() function. In the event that the URI needs to exceed 4, I recommend the following solutions:
* Using asynchronous data transfer. The resulting URI would look as such: /sample_project/students/4
* Using query string in the URL. The resulting URI would look as such: /sample_project/students/4?action=edit
The reason for the suggestions is that the framework does not support URI lengths exceeding 4 as I personally find it unecessary and excessive to have URIs greater than the count of 4.

## Commands available:
* (Every command must be preceeded by "php chalaza")
* Generate commands can be *shortened* to `g:[module-type]`
* `generate:controller [controller-name]`
	* Generates a controller in php/controllers, a view in resources/view, include_once and use lines in the config file, and the necessary lines in the routes file.
	* (e.g. `g:controller employees`)
* `generate:function [controller-name] [function-name] [argument-1] [argument-2]...[argument-n]`
	* Generates a function with the name specified in the target controller.
	* Includes all specified arguments for the function.
	* Argument names are separated by spaces in the command.
	* (e.g. `g:function employees searchEmployee employee_id auth_id`)