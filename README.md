
# Egg Stack
## by Julac Ontina

This framework is based on the Controller-Domain-Repository-Service (CDRS) framework or structure found in Java Spring Boot.
It is meant to replace Softboiled-MVC as the Model-Controller-View (MVC) was found able to be further separated into more parts increasing clarity and modularity in the systems developed with the CDRS framework.

**Framework notes:**
* URI length (in a local environment) is usually up to 4 when URI array in root index file is counted with PHP count() function. In the event that the URI needs to exceed 4, I recommend the following solutions:
	* Using asynchronous data transfer. The resulting URI would look as such: /sample_project/students/4
	* Using query string in the URL. The resulting URI would look as such: /sample_project/students/4?action=edit
The reason for the suggestions is that the framework does not support URI lengths exceeding 4 as I personally find it unecessary and excessive to have URIs greater than the count of 4.

**Commands available:** *(Every command must be preceeded by "php chalaza")*
**Generate single** *Generate commands can be shortened to g:[module-type]*
* **generate:controller** *[controller-name]*
	* Generates a controller in php/controllers, a view in resources/view, reference lines in the config file, and routes.
	* *(e.g. g:controller egg)*
* **generate:domain** *[domain-name]*
	* Generates a domain in php/domain.
	* *(e.g. g:domain egg)*
* **generate:repository** *[repository-name]*
	* Generates a repository in php/domain.
	* *(e.g. g:repository egg)*
* **generate:service** *[service-name]*
	* Generates a service in php/domain.
	* *(e.g. g:service egg)*
* **generate:function** *[controller-name] [function-name] [argument-1] [argument-2]...[argument-n]*
	* Generates a function with the name specified.
	* Includes all specified arguments for the function.
	* Argument names are separated by spaces in the command.
	* *(e.g. g:f*unction employees searchEmployee employee_id auth_id)*
* **generate:route** *[module-name] [function-name]*
	* Generates a route with the name specified.

**Generate multiple** *Generate commands can be shortened to gm:[module-types]*
* **generatemultiple:***[module-types] [module-name]*
* The module types to be generated should be typed as single letters
* *(e.g. gm:cdrs)*
	* This generates all four module types—namely: controller, domain, repository, service.
* *(e.g. gm:cd)*
	* This generates only a controller and a domain module type.
* This command can recognize unknown module type input.