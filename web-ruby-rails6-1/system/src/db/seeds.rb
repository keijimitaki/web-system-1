# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the bin/rails db:seed command (or created alongside the database with db:setup).
#
# Examples:
#
#   movies = Movie.create([{ name: 'Star Wars' }, { name: 'Lord of the Rings' }])
#   Character.create(name: 'Luke', movie: movies.first)


50.times do |i|
  Topic.create(
    name: "タイトル #{i}", 
    toc: "TOC #{i}", 
    memo: "メモ #{i}", 
    created_at: Time.new,
    updated_at: Time.new,
    deleted_at: nil,
    )
end