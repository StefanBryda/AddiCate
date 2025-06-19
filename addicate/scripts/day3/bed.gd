extends Area2D
	
var player_in_area = false

func _on_body_entered(body):
	if body.is_in_group("Player"):
		player_in_area = true

func _on_body_exited(body):
	if body.is_in_group("Player"):
		player_in_area = false

func _process(delta):
	if player_in_area and Input.is_action_just_pressed("Interact"):
		print("detected")
		call_deferred("_change_scene")
		
func _change_scene():
		get_tree().change_scene_to_file("res://scenes/day3/Bedroom_morning.tscn")
