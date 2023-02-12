class AddColumnTopics < ActiveRecord::Migration[6.1]
  def change
    add_column :topics, :deleted_at, :datetime, column_options: { null: true }
  end
end
