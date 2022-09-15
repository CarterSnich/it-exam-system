<?php

function yearLevelToWords(int $year_level)
{
    return ['First Year', 'Second Year', 'Third Year', 'Fourth Year'][$year_level - 1];
}
