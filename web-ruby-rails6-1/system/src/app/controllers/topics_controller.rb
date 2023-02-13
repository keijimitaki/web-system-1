class TopicsController < ApplicationController
  before_action :set_topic, only: %i[ show edit update destroy ]

  # GET /topics or /topics.json
  def index
    @topics = Topic.all
  end

  # POST /topics or /topics.json
  def create
    @topic = Topic.new(topic_params)

    respond_to do |format|
      if @topic.save
        format.html { redirect_to topic_url(@topic), notice: "Topic was successfully created." }
        #format.json { render :show, status: :created, location: @topic }
      else
        format.html { render :new, status: :unprocessable_entity }
        #format.json { render json: @topic.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /topics/1 or /topics/1.json
  def update
    respond_to do |format|
      
      db_param = {
        "id" => topic_params[:"id"], 
        "name" => topic_params[:"name-selected"], 
        "toc" => topic_params[:"toc-selected"], 
        "memo" => topic_params[:"memo-selected"], 
      }
      
      if @topic.update(db_param)
        format.html { redirect_to topic_url(@topic), notice: "Topic was successfully updated." }
      #  format.json { render :show, status: :ok, location: @topic }
      else
        format.html { render :edit, status: :unprocessable_entity }
      #  format.json { render json: @topic.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /topics/1 or /topics/1.json
  def destroy
    @topic.destroy

    respond_to do |format|
      format.html { redirect_to topics_url, notice: "Topic was successfully destroyed." }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_topic      
      @topic = Topic.find(params[:id])
      Rails.logger.debug "@topic"
      Rails.logger.debug @topic.inspect

    end

    # Only allow a list of trusted parameters through.
    def topic_params
      Rails.logger.debug "params"
      Rails.logger.debug params
      #params.require(:topic).permit(:name, :toc, :memo)
      params.permit(:"id", :"name-selected", :"toc-selected", :"memo-selected")
    end
end
