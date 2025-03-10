<?php

// test('example', function () {
//     // expect(true)->toBeTrue();
//     expect(true)->toBeFalse();
// });

use App\Models\Employer;
use App\Models\Job;

it('blongs to an employer', function () {    
    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);
    // Act & Assert
    // is = überprüft, ob aktuelle Instanz
    expect($job->employer->is($employer))->toBeTrue();
});
