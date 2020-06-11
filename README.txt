
==============================================
       Egg Stack by Julac Ontina
==============================================

This framework is based on the Controller-Domain-Repository-Service (CDRS) framework or structure found in Java Spring Boot.
It is meant to replace Softboiled-MVC as the Model-Controller-View (MVC) was found able to be further separated into more parts increasing clarity and modularity in the systems developed with the CDRS framework.

Framework notes:
==> URI length (in a local environment) is usually up to 4 when URI array in root index file is counted with PHP count() function. In the event that the URI needs to exceed 4, I recommend the following solutions:
	--> Using asynchronous data transfer. The resulting URI would look as such: /sample_project/students/4
	--> Using query string in the URL. The resulting URI would look as such: /sample_project/students/4?action=edit
The reason for the suggestions is that the framework does not support URI lengths exceeding 4 as I find it unecessary and excessive to have URIs greater than the count of 4.

==> Commands available:
	(Base command is "php chalaza")
	--> generate:[module-type]
		-> (e.g. generate:controller)
		-> The command can be shortened to g:[module-type]