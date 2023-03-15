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
