<?php

namespace Marktic\Billing\BillingSubject\Models;

use Marktic\Billing\BillingStatuses\ModelsRelated\HasBillingStatus\HasBillingStatusRepository;

interface BillingSubjectRepository extends HasBillingStatusRepository
{

}