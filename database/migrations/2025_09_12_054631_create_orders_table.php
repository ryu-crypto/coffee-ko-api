public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('product_id')->constrained()->onDelete('cascade');
        $table->integer('quantity');
        $table->decimal('total_price', 8, 2);
        $table->string('status')->default('pending'); // pending, completed, cancelled
        $table->timestamps();
    });
}
