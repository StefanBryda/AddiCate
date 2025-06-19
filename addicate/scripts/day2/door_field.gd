extends Node


func _on_body_entered(body):
	if body.is_in_group("Player"):
		call_deferred("_change_scene")
		
func _change_scene():
		get_tree().change_scene_to_file("res://scenes/day2/Field.tscn")
