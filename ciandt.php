<?php

test();

function test()
{
	// testcase 1
	$totalMemory=10; // MB
	$foregroundApps = [[1,2], [2,5], [3,8], ];
	$backgroundApps = [[1,4], ];

	$resultArr = ciandt($totalMemory, $foregroundApps, $backgroundApps);

	echo "TESTCASE 1\n";
	foreach ($resultArr as $key => $valueArr) {
		echo "[" . $valueArr[0] . "," . $valueArr[1] . "]\n";
	}

	// testcase 2
	$totalMemory=20; // MB
	$foregroundApps = [[1,10], [2,15], [3,17], ];
	$backgroundApps = [[1,3], [2, 5], ];

	$resultArr = ciandt($totalMemory, $foregroundApps, $backgroundApps);

	echo "\nTESTCASE 2\n";
	foreach ($resultArr as $key => $valueArr) {
		echo "[" . $valueArr[0] . "," . $valueArr[1] . "," . $valueArr[2] . "]\n";
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
					if($maxMemory <= $totalMemory){
						if(isset($resultArr[$foregroundApp[0]])){
							if($resultArr[$foregroundApp[0]][2] < $maxMemory){
								$resultArr[$foregroundApp[0]] = [$foregroundApp[0], $backgroundApp[0], $maxMemory];
							}
						}else{
							$resultArr[$foregroundApp[0]] = [$foregroundApp[0], $backgroundApp[0], $maxMemory];
						}
					}
				}
			}
		}
	}

	// $tempArr = $resultArr;
	// foreach ($resultArr as $key => $record) {
	// 	$tempArr[$resultArr[$key][0]] = $resultArr
	// }

	return $resultArr;
}
