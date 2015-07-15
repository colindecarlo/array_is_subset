<?php

function array_is_subset( $superset, $subset) {
    if (count($superset)<count($subset))
    {
        return FALSE;
    }

    $candidates = $superset;
    $found = 0;

    foreach($subset as $elem)
    {
        // the candidates array is empty then we're done
        if (empty($candidates)) {
            break;
        }

        $foundAt = null;
        $attributes = array_keys($elem);
        foreach ($candidates as $key=>$candidate) {
            $candidateAttributes = array_keys($candidate);
            if (array_intersect($attributes, $candidateAttributes) != $attributes) {
                continue;
            }

            foreach ($attributes as $attribute) {
                $isArray = is_array($elem[$attribute]);
                if ($isArray && !is_array($candidate[$attribute])) {
                    continue 2;
                }

                if ($isArray) {
                    $ck1 = array_keys($candidate[$attribute])[0];
                    $ek1 = array_keys($elem[$attribute])[0];
                    if (is_array($candidate[$attribute][$ck1]) && is_array($elem[$attribute][$ek1])) {
                        if (!array_is_subset($candidate[$attribute], $elem[$attribute])) {
                            continue 2;
                        }
                        break;
                    }

                    if (array_intersect($elem[$attribute], $candidate[$attribute]) != $elem[$attribute]) {
                        continue 2;
                    }
                }

                if ($candidate[$attribute] != $elem[$attribute]) {
                    continue 2;
                }
            }

            $foundAt = $key;
            break;
        }

        $found += (int)($foundAt !== null);
        unset($candidates[$foundAt]);
    }

    return $found == count($subset);
}
