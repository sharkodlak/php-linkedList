# phlink
PHP linked list implementation


Singly linked list
A  -> B  -> C  -> D  -> E

A:last() returns E, because E has no next node.
C:last() also returns E for same reason.


Circular Singly linked list
A  -> B  -> C  -> D  -> E
^                       |
\-----------------------/

A:last() returns E, because E's next node is A.
C:last() returns B, because this list has no end and B is last node before C.


Doubly linked list
A <-> B <-> C <-> D <-> E

Circular Doubly linked list
A <-> B <-> C <-> D <-> E
^                       ^
\-----------------------/



Sorted Linked List is implemented as decorator, because it's not special type
of list. Sorted List can be singly or doubly listed, depends on implementation.
Only one think that Sorted list does is selecting right node where to
append new value. So it can be done as special list handler class without
LinkedList interface implementation. This can be bit confusing why some
Linked Lists classes are implementation of interface and others not,
so Decorator is used to let this handle behave as general Linked List.
This handler must update it's reference to first item in case minimal value
is added.

Because LinkedList is implemented that it can accept int|string value
order of that values can be strange if types are combined. In that case
feel fre to implements your own comparator.