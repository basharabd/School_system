<?php

namespace App\Providers;

use App\Repository\AttendanceRepository;
use App\Repository\AttendanceRepositoryInterface;
use App\Repository\ExamRepository;
use App\Repository\ExamRepositoryInterface;
use App\Repository\FeeInvoicesRepository;
use App\Repository\FeeInvoicesRepositoryInterface;
use App\Repository\FeesRepository;
use App\Repository\FeesRepositoryInterface;
use App\Repository\LibraryRepository;
use App\Repository\LibraryRepositoryInterface;
use App\Repository\PaymentRepository;
use App\Repository\PaymentRepositoryInterface;
use App\Repository\ProcessingFeeRepository;
use App\Repository\ProcessingFeeRepositoryInterface;
use App\Repository\QuestionRepository;
use App\Repository\QuestionRepositoryInterface;
use App\Repository\QuizzRepository;
use App\Repository\QuizzRepositoryInterface;
use App\Repository\ReceiptStudentsRepository;
use App\Repository\ReceiptStudentsRepositoryInterface;
use App\Repository\StudentGraduatedRepository;
use App\Repository\StudentGraduatedRepositoryInterface;
use App\Repository\StudentPromotionRepository;
use App\Repository\StudentPromotionRepositoryInterface;
use App\Repository\StudentRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\SubjectRepository;
use App\Repository\SubjectRepositoryInterface;
use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;



use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(StudentPromotionRepositoryInterface::class, StudentPromotionRepository::class);
        $this->app->bind(StudentGraduatedRepositoryInterface::class, StudentGraduatedRepository::class);
        $this->app->bind(FeesRepositoryInterface::class, FeesRepository::class);
        $this->app->bind(FeeInvoicesRepositoryInterface::class, FeeInvoicesRepository::class);
        $this->app->bind(ReceiptStudentsRepositoryInterface::class, ReceiptStudentsRepository::class);
        $this->app->bind(ProcessingFeeRepositoryInterface::class, ProcessingFeeRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(QuizzRepositoryInterface::class, QuizzRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);

        $this->app->bind(LibraryRepositoryInterface::class, LibraryRepository::class);


    }

            

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}