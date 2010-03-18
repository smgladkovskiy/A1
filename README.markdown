This fork of A1 module by "Wouter":http://github.com/Wouterrr/A1 combines the work of the original A1 module and the idea of functional separation to work with databases on driver support for various models of ORM by "mlb":http://github.com/mlb/A1 (for this moment Kohana ORM and Sprig drivers are available).

Change orm driver in the config file. *Kohana ORM* is set by default.

If you wish to use your own ORM library, then you need to create a driver that will implements the *interface* of A1 driver that is placed in driver folder.