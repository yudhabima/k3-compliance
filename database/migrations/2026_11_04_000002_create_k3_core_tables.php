<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('industries', function(Blueprint $t){$t->id();$t->string('name')->unique();$t->text('description')->nullable();$t->timestamps();});
  Schema::create('hazards', function(Blueprint $t){$t->id();$t->string('name')->unique();$t->text('description')->nullable();$t->timestamps();});
  Schema::create('companies', function(Blueprint $t){$t->id();$t->string('name');$t->foreignId('industry_id')->constrained()->restrictOnDelete();$t->string('location')->nullable();$t->unsignedInteger('employee_count');$t->text('hazard_summary')->nullable();$t->string('fire_risk_class',30);$t->timestamps();});
  Schema::create('k3_indicators', function(Blueprint $t){$t->id();$t->string('code')->unique();$t->string('group_name',80);$t->string('name');$t->string('unit',40)->nullable();$t->string('assessment_method',20)->default('ratio');$t->text('description')->nullable();$t->boolean('is_active')->default(true);$t->timestamps();});
  Schema::create('k3_standards', function(Blueprint $t){$t->id();$t->foreignId('indicator_id')->constrained('k3_indicators')->cascadeOnDelete();$t->string('fire_risk_class',30)->nullable();$t->decimal('minimum_value',12,2)->default(0);$t->string('operator',5)->default('>=');$t->string('regulation_name')->nullable();$t->string('regulation_reference')->nullable();$t->text('notes')->nullable();$t->boolean('is_active')->default(true);$t->timestamps();});
  Schema::create('assessments', function(Blueprint $t){$t->id();$t->foreignId('company_id')->constrained()->cascadeOnDelete();$t->string('public_token',60)->unique();$t->date('assessment_date');$t->string('status',30)->default('draft');$t->unsignedInteger('total_indicators')->default(0);$t->unsignedInteger('compliant_count')->default(0);$t->unsignedInteger('partial_count')->default(0);$t->unsignedInteger('non_compliant_count')->default(0);$t->decimal('overall_percentage',5,2)->default(0);$t->text('notes')->nullable();$t->timestamps();});
  Schema::create('assessment_details', function(Blueprint $t){$t->id();$t->foreignId('assessment_id')->constrained()->cascadeOnDelete();$t->foreignId('indicator_id')->constrained('k3_indicators')->restrictOnDelete();$t->foreignId('standard_id')->nullable()->constrained('k3_standards')->nullOnDelete();$t->decimal('actual_value',12,2)->default(0);$t->decimal('standard_value',12,2)->default(0);$t->decimal('percentage',7,2)->default(0);$t->string('status',40);$t->decimal('gap_value',12,2)->default(0);$t->text('notes')->nullable();$t->timestamps();$t->unique(['assessment_id','indicator_id']);});
 }
 public function down(): void { Schema::dropIfExists('assessment_details');Schema::dropIfExists('assessments');Schema::dropIfExists('k3_standards');Schema::dropIfExists('k3_indicators');Schema::dropIfExists('companies');Schema::dropIfExists('hazards');Schema::dropIfExists('industries'); }
};
