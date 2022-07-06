<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints(Point $a, Point $b): void
    {
        $temp = $a->x;
        $temp2 = $b->x;
        $a->x = $temp2;
        $b->x = $temp;

        $temp3 = $a->y;
        $temp4 = $b->y;
        $a->y = $temp4;
        $b->y = $temp3;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

echo "(" . $p1->x . ", " . $p1->y . ")";
echo "(" . $p2->x . ", " . $p2->y . ")";

$p1->swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")";
echo "(" . $p2->x . ", " . $p2->y . ")";





