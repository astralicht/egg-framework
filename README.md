
# Egg Stack
*A lightweight PHP framework for quick project creation.*
*by Julac Ontina*

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
* This command can recognize unknown module type input and show an error message for it.