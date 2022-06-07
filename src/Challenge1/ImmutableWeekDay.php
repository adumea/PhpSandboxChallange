<?php

namespace Interview\Challenge1;

/*

Your job is to fill the class to cover all assertions. You can additionally look at test/Challenge1Test.php

$day1 = new ImmutableWeekDay(ImmutableWeekDay::FRIDAY);
$day2 = new ImmutableWeekDay(ImmutableWeekDay::FRIDAY);
$day3 = $day1->addDays(9);

assertFalse($day1->equals($day3));
assertTrue($day1->isOfValue(ImmutableWeekDay::FRIDAY));
assertFalse($day1->isOfValue(123));
assertTrue($day1->equals($day2));
assertTrue($day3->isOfValue(ImmutableWeekDay::SUNDAY));

assertException(\OutOfRangeException::class);
new ImmutableWeekDay(123);

*/
class ImmutableWeekDay
{
    public const SUNDAY    = 0;
    public const MONDAY    = 1;
    public const TUESDAY   = 2;
    public const WEDNESDAY = 3;
    public const THURSDAY  = 4;
    public const FRIDAY    = 5;
    public const SATURDAY  = 6;

    /**
     * @throws \OutOfRangeException
     */
    public function __construct(int $value)
    {
        if ($value > 6 || $value < 0) {
            throw new \OutOfRangeException;
        }

        $this->value = $value;
    }

    public function addDays(int $value): ImmutableWeekDay
    {
        $value = ($this->value + $value)%7;
        return new ImmutableWeekDay($value);
    }

    public function equals(ImmutableWeekDay $day): bool
    {
        return $this->value === $day->value;
    }

    public function isOfValue(int $value): bool
    {
        return $this->value === $value;
    }
}