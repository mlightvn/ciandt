<?php

test();

function test()
{
	$totalMemory=10; // MB
	$foregroundApps = [[1,2], [2,5], [3,8], ];
	$backgroundApps = [[1,4], ];

	$resultArr = ciandt($totalMemory, $foregroundApps, $backgroundApps);

	foreach ($resultArr as $key => $valueArr) {
		echo "[" . $valueArr[0] . "," . $valueArr[1] . "]\n";
	}
}

function ciandt($totalMemory=0, $foregroundApps = [], $backgroundApps = [])
{
	$resultArr = [];

	$maxMemory = 0;
	foreach ($foregroundApps as $keyFore => $foregroundApp) {
		foreach ($backgroundApps as $keyBack => $backgroundApp) {
			if(count($foregroundApp) == 2){
				if(count($foregroundApp) == 2){
					$maxMemory = $foregroundApp[1] + $backgroundApp[1];
					if($maxMemory < $totalMemory){
						$resultArr[] = [$foregroundApp[0], $backgroundApp[0]];
					}
				}
			}
		}
	}

	return $resultArr;
}
