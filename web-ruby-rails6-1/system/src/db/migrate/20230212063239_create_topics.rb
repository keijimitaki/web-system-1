class CreateTopics < ActiveRecord::Migration[6.1]
  def change
    create_table :topics do |t|
      t.string :name
      t.text :toc
      t.string :memo

      t.timestamps
    end
  end
end
